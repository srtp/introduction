const db = require("../model/stormDB");

const getAllComment = (req, res) => {
  const comments = db.get("comments").value();
  res.send(comments);
};

const getByIdComment = (req, res) => {
  const { id } = req.params;
  const comments = db.get("comments").value();
  const comment = comments.filter((comment) => comment.postId == id);
  res.send(comment);
};

const createComment = (req, res) => {
  const comment = req.body;
  db.get("comments").push(comment).save();
  res.status(201).send({
    success: "ok",
  });
};

const delComment = (req, res) => {
  const { id } = req.params;
  db.get("comments")
    .filter((comment) => comment.postId != id)
    .save();

  res.status(200).send({
    success: "ok",
  });
};

const updateComment = (req, res) => {
  const { id } = req.params;
  const comment = req.body;
  const comments = db.get("comments").value();

  const indexComment = comments.findIndex((comment) => comment.id == id);
  db.get("comments").get(indexComment).set(comment).save();
  res.status(200).send({
    success: "ok",
  });
};

module.exports = {
  getAllComment,
  getByIdComment,
  createComment,
  delComment,
  updateComment,
};
