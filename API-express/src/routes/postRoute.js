const { Router } = require("express");
const postController = require("../controllers/postController");

const router = Router();

router.route("/posts").get(postController.getAll);
router.route("/posts").post(postController.createPost);
router.route("/posts/:id").get(postController.getById);
// Update post // put is update all obj //  patch is update some obj
router.route("/posts/:id").put(postController.updatePost);
router.route("/posts/:id").delete(postController.delPost);

module.exports = router;
