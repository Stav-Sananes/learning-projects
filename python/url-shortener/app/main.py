from fastapi import FastAPI, Depends, HTTPException, status
from fastapi.responses import RedirectResponse
from sqlalchemy.orm import Session
from typing import List

from . import models, schemas, crud
from .database import engine, get_db
from .config import settings

models.Base.metadata.create_all(bind=engine)

app = FastAPI(
    title="URL Shortener API",
    description="A simple URL shortener service built with FastAPI",
    version="1.0.0"
)


@app.get("/")
def read_root():
    """Welcome endpoint"""
    return {
        "message": "Welcome to URL Shortener API",
        "docs": "/docs",
        "version": "1.0.0"
    }


@app.post("/shorten", response_model=schemas.URLResponse, status_code=status.HTTP_201_CREATED)
def create_short_url(
        url_data: schemas.URLCreate,
        db: Session = Depends(get_db)
):
    """
    Create a shortened URL

    - **original_url**: The long URL to shorten
    - **custom_code**: Optional custom short code (4-20 characters)
    """
    # Create short URL
    db_url = crud.create_short_url(
        db=db,
        original_url=str(url_data.original_url),
        custom_code=url_data.custom_code
    )

    if not db_url:
        raise HTTPException(
            status_code=status.HTTP_400_BAD_REQUEST,
            detail="Custom code already exists. Please choose another one."
        )

    # Add short_url to response
    response = schemas.URLResponse.model_validate(db_url)
    response.short_url = f"{settings.base_url}/{db_url.short_code}"

    return response


@app.get("/{short_code}")
def redirect_to_url(short_code: str, db: Session = Depends(get_db)):
    """
    Redirect to original URL using short code
    """
    db_url = crud.get_url_by_short_code(db, short_code)

    if not db_url:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Short URL not found"
        )

    crud.increment_click_count(db, short_code)

    return RedirectResponse(url=db_url.original_url, status_code=status.HTTP_307_TEMPORARY_REDIRECT)


@app.get("/stats/{short_code}", response_model=schemas.URLStats)
def get_url_stats(short_code: str, db: Session = Depends(get_db)):
    """
    Get statistics for a shortened URL
    """
    db_url = crud.get_url_by_short_code(db, short_code)

    if not db_url:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Short URL not found"
        )

    return db_url


@app.get("/api/urls", response_model=List[schemas.URLStats])
def list_urls(skip: int = 0, limit: int = 100, db: Session = Depends(get_db)):
    """
    List all URLs with pagination

    - **skip**: Number of records to skip (default: 0)
    - **limit**: Maximum number of records to return (default: 100)
    """
    urls = crud.get_all_urls(db, skip=skip, limit=limit)
    return urls


@app.delete("/api/urls/{short_code}", status_code=status.HTTP_204_NO_CONTENT)
def delete_url(short_code: str, db: Session = Depends(get_db)):
    """
    Delete (deactivate) a shortened URL
    """
    success = crud.delete_url(db, short_code)

    if not success:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Short URL not found"
        )

    return None


if __name__ == "__main__":
    import uvicorn

    uvicorn.run(app, host="0.0.0.0", port=8000)