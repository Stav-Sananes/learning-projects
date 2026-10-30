from pydantic import BaseModel, HttpUrl, Field
from datetime import datetime
from typing import Optional


class URLCreate(BaseModel):
    original_url: HttpUrl
    custom_code: Optional[str] = Field(None, min_length=4, max_length=20)


class URLResponse(BaseModel):
    id: int
    original_url: str
    short_code: str
    short_url: str
    created_at: datetime
    clicks: int
    is_active: bool

    class Config:
        from_attributes = True


class URLStats(BaseModel):
    short_code: str
    original_url: str
    clicks: int
    created_at: datetime
    is_active: bool

    class Config:
        from_attributes = True