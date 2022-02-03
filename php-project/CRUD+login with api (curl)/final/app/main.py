import uvicorn
from fastapi import FastAPI, Path, Query, HTTPException
from starlette.responses import JSONResponse
from typing import Optional
from fastapi.middleware.cors import CORSMiddleware

from database.mongodb import MongoDB
from config.development import config
from model.student import createStudentModel, updateStudentModel

mongo_config = config["mongo_config"]
mongo_db = MongoDB(
    mongo_config["host"],
    mongo_config["port"],
    mongo_config["user"],
    mongo_config["password"],
    mongo_config["auth_db"],
    mongo_config["db"],
    mongo_config["collection"],
)
mongo_db._connect()

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)


@app.get("/")
def index():
    return JSONResponse(content={"message": "Student Info"}, status_code=200)


@app.get("/account/")
def get_account(
    sort_by: Optional[str] = None,
    order: Optional[str] = Query(None, min_length=3, max_length=4),
):

    try:
        result = mongo_db.find(sort_by, order)
    except:
        raise HTTPException(status_code=500, detail="Something went wrong !!")

    return JSONResponse(
        content=result,
        status_code=200,
    )


@app.get("/account/{user}")
def get_account_by_id(user: str = Path(None, min_length=4, max_length=15)):
    try:
        result = mongo_db.find_one(user)
    except:
        raise HTTPException(status_code=500, detail="Something went wrong !!")

    if result is None:
        raise HTTPException(status_code=404, detail="ไม่เจอ  User !!")

    return JSONResponse(
        content={"status": "OK", "data": result},
        status_code=200,
    )


@app.post("/account")
def create_books(account: createStudentModel):
    try:
        user = mongo_db.create(account)
    except:
        raise HTTPException(status_code=500, detail="Something went wrong !!")

    return JSONResponse(
        content={
            "status": "ok",
            "data": {
                "user": user,
            },
        },
        status_code=201,
    )


@app.patch("/account/{user}")
def update_books(
    update_account: updateStudentModel,
    user: str = Path(None, min_length=4, max_length=15),
):
    try:
        updated_account, modified_count = mongo_db.update(user, update_account)
    except:
        raise HTTPException(status_code=500, detail="Something went wrong !!")

    if modified_count == 0:
        raise HTTPException(
            status_code=404,
            detail=f"User: {updated_account} is not update want fields",
        )

    return JSONResponse(
        content={
            "status": "ok",
            "data": {
                "User:": updated_account,
                "modified_count": modified_count,
            },
        },
        status_code=200,
    )


@app.delete("/account/{user}")
def delete_book_by_id(user: str = Path(None, min_length=4, max_length=15)):
    try:
        deleted_user, deleted_count = mongo_db.delete(user)
    except:
        raise HTTPException(status_code=500, detail="Something went wrong !!")

    if deleted_count == 0:
        raise HTTPException(
            status_code=404, detail=f"user: {deleted_user} is not Delete"
        )

    return JSONResponse(
        content=deleted_user,
        status_code=200,
    )


if __name__ == "__main__":
    uvicorn.run("main:app", host="127.0.0.1", port=3001, reload=True)
