import React from "react";

export default function InputSingleComment(props) {
  const { dataBlog, setAllComment, allComment } = props;
  //  Comment
  const startComment = {
    comment: "",
    author: "",
  };

  //  State Comment
  const [comment, setComment] = React.useState(startComment);

  //  Funciton onChange Value for comment
  const onChangeValueComment = (event) => {
    const { name, value } = event.target;
    setComment((prevComment) => {
      return {
        ...prevComment,
        [name]: value,
      };
    });
  };

  console.log(allComment);
  //  Funciton onSubmitComment
  const onSubmitComment = (event) => {
    event.preventDefault();
    setAllComment((prevAllComment) => {
      const newComment = { ...comment };
      newComment.idBlog = dataBlog.id;
      newComment.id = Math.floor(Math.random() * 90000) + 10000;
      return [newComment, ...prevAllComment];
    });
    setComment(startComment);
  };
  return (
    <div>
      <div className="single-comment">
        <form onSubmit={onSubmitComment} style={{ width: 800 }}>
          <textarea
            placeholder="comment"
            name="comment"
            value={comment.comment}
            onChange={onChangeValueComment}
            className="textarea"
          ></textarea>
          <br />
          <input
            type="text"
            placeholder="user"
            name="author"
            value={comment.author}
            className="input is-primary"
            onChange={onChangeValueComment}
          />

          <br />
          <br />
          <button className="button is-success" type="submit">
            submit
          </button>
        </form>
      </div>
    </div>
  );
}
