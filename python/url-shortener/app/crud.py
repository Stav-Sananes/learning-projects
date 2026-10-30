from sqlalchemy.orm import Session
from . import models
import string
import random


def generate_short_code(length: int = 6) -> str:
    """Generate a random short code"""
    characters = string.ascii_letters + string.digits
    return ''.join(random.choice(characters) for _ in range(length))


def get_url_by_short_code(db: Session, short_code: str):
    """Get URL by short code"""
    return db.query(models.URL).filter(
        models.URL.short_code == short_code,
        models.URL.is_active == True
    ).first()


def get_url_by_id(db: Session, url_id: int):
    """Get URL by ID"""
    return db.query(models.URL).filter(models.URL.id == url_id).first()


def create_short_url(db: Session, original_url: str, custom_code: str = None):
    """Create a new short URL"""
    # Use custom code if provided, otherwise generate random one
    if custom_code:
        # Check if custom code already exists
        existing = get_url_by_short_code(db, custom_code)
        if existing:
            return None
        short_code = custom_code
    else:
        # Generate unique short code
        while True:
            short_code = generate_short_code()
            if not get_url_by_short_code(db, short_code):
                break

    db_url = models.URL(
        original_url=str(original_url),
        short_code=short_code
    )
    db.add(db_url)
    db.commit()
    db.refresh(db_url)
    return db_url


def increment_click_count(db: Session, short_code: str):
    """Increment click count for a URL"""
    url = get_url_by_short_code(db, short_code)
    if url:
        url.clicks += 1
        db.commit()
        db.refresh(url)
    return url


def get_all_urls(db: Session, skip: int = 0, limit: int = 100):
    """Get all URLs with pagination"""
    return db.query(models.URL).offset(skip).limit(limit).all()


def delete_url(db: Session, short_code: str):
    """Soft delete a URL by deactivating it"""
    url = get_url_by_short_code(db, short_code)
    if url:
        url.is_active = False
        db.commit()
        return True
    return False