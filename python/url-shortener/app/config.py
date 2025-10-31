from pydantic_settings import BaseSettings


class Settings(BaseSettings):
    database_url: str = "sqlite:///./url_shortener.db"
    base_url: str = "http://localhost:8000"
    short_code_length: int = 6

    class Config:
        env_file = ".env"


settings = Settings()