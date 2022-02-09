import React, { useEffect, useState } from "react";
import { observer } from "mobx-react-lite";
import { store } from "../store/store";
import "../style.css";
import { useParams } from "react-router-dom";

const PostElements = observer(() => {
  const { id } = useParams();
  const [Comment, setComment] = useState(null);
  const showComments = store.comments.filter((theComment) => {
    return theComment.postId === Number(id);
  });
  const onChangeValue = (event) => {
    const { name, value } = event.target;
    setComment((prevComment) => {
      return {
        ...prevComment,
        [name]: value,
      };
    });
  };

  const onSubmit = () => {
    store.createComment(Comment, id);
  };

  const closePopup = () => {
    setComment(null);
  };

  useEffect(() => {
    store.getByid(id);
    store.getAllCommentsByIdPost(id);
  }, []);

  let CommentElement = null;
  if (!!Comment) {
    CommentElement = (
      <div key={id}>
        <div>
          <div className="edit-blog-bg">
            <form className="form-edit" onSubmit={onSubmit}>
              <h1>คอมเม้นท์</h1>
              <br />
              <br />
              <textarea
                name="body"
                id=""
                rows="10"
                value={Comment.body}
                onChange={onChangeValue}
                className="textarea"
                placeholder="content"
              ></textarea>{" "}
              <br />
              <input
                name="author"
                type="text"
                value={Comment.author}
                onChange={onChangeValue}
                className="input is-primary"
                placeholder="author"
              />
              <br /> <br />
              <button className="button is-success" type="submit">
                Submit
              </button>{" "}
              <button className="button is-info" onClick={closePopup}>
                Close
              </button>
            </form>
          </div>
        </div>
      </div>
    );
  }

  return (
    <div>
      {store.thePost.map((post) => {
        return (
          <div key={post.id}>
            <div className="postElement">
              <h1>ชื่อกระทู้ : {post.topic}</h1>
              <br />
              <h2>เนื้อหา</h2>
              <p>{post.content}</p>
              <br />
              <h1>
                ผู้เขียน : {post.author} <span>หมายเลขกระทู้ : {post.id}</span>
              </h1>
            </div>
            <div>
              <br />
              <div className="box-comments">
                <h2>แสดงความคิดเห็น</h2>
                <div>
                  {" "}
                  {showComments.map((theComment) => {
                    return (
                      <div className="box-commentsIn">
                        <h1>ชื่อผู้ตอบกลับ : {theComment.author}</h1>
                        <h2>ความคิดเห็น : {theComment.body}</h2>
                      </div>
                    );
                  })}
                </div>
              </div>
              <br />
              <button
                className="button is-light is-small"
                onClick={() => {
                  setComment(post.id);
                }}
              >
                Comment
              </button>
            </div>
          </div>
        );
      })}
      {CommentElement}
    </div>
  );
});

export default PostElements;
