const { Router } = require("express");
const commentController = require("../controllers/commentController");

const router = Router();

router.route("/comments").get(commentController.getAllComment);
router.route("/comments/:id").get(commentController.getByIdComment);
router.route("/comments").post(commentController.createComment);
router.route("/comments/:id").put(commentController.updateComment); // Update post // put is update all obj //  patch is update some obj
router.route("/comments/:id").delete(commentController.delComment);

module.exports = router;
