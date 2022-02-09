const StormDB = require("stormdb");
const engine = new StormDB.localFileEngine("./db/db.stormdb");
const db = new StormDB(engine);
db.default({ posts: [], comments: [] });

module.exports = db;
