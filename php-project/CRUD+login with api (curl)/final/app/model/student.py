from typing import Optional, List
from pydantic import BaseModel, Field


class createStudentModel(BaseModel):
    user: str
    password: str
    email: str


class updateStudentModel(BaseModel):
    password: Optional[str]
    email: Optional[str]
