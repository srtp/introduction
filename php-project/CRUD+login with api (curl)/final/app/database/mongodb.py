import pymongo

from model.student import createStudentModel, updateStudentModel


class MongoDB:
    def __init__(self, host, port, user, password, auth_db, db, collection):
        self.host = host
        self.port = port
        self.user = user
        self.password = password
        self.auth_db = auth_db
        self.db = db
        self.collection = collection
        self.connection = None

    def _connect(self):
        client = pymongo.MongoClient(
            host=self.host,
            port=self.port,
            username=self.user,
            password=self.password,
            authSource=self.auth_db,
            authMechanism="SCRAM-SHA-1",
        )
        db = client[self.db]
        self.connection = db[self.collection]

    def find(self, sort_by, order):
        mongo_results = self.connection.find({})
        if sort_by is not None and order is not None:
            mongo_results.sort(sort_by, self._get_sort_by(order))

        return list(mongo_results)

    def _get_sort_by(self, sort: str) -> int:
        return pymongo.DESCENDING if sort == "desc" else pymongo.ASCENDING

    def find_one(self, user):
        return self.connection.find_one({"_id": user})

    def create(self, user: createStudentModel):
        user_dict = user.dict(exclude_unset=True)

        insert_dict = {**user_dict, "_id": user_dict["user"]}

        inserted_result = self.connection.insert_one(insert_dict)
        user = str(inserted_result.inserted_id)

        return user

    def update(self, user, update_account: updateStudentModel):
        query = {"_id": user}
        update_data = {"$set": update_account.dict(exclude_unset=True)}

        updated_result = self.connection.update_one(query, update_data)
        return [user, updated_result.modified_count]

    def delete(self, user):
        deleted_result = self.connection.delete_one({"_id": user})
        return [user, deleted_result.deleted_count]
