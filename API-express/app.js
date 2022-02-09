const express = require("express");
const bodyParser = require("body-parser");
const postRoute = require("./src/routes/postRoute");
const commentRoute = require("./src/routes/commentRoute");
const cors = require("cors");

const app = express();
app.use(bodyParser.json());

app.get("/", function (req, res) {
  res.send("Hello World");
});

const corsOptions = {
  origin: "http://localhost:3000",
  credentials: true,
};

app.use(cors(corsOptions));

app.use("", postRoute);
app.use("", commentRoute);

app.listen(3001);
