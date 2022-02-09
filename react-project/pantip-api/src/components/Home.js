import React, { useEffect, useState } from "react";
import { observer } from "mobx-react-lite";
import { store } from "./store/store";
import "./style.css";
import { Link } from "react-router-dom";

const Home = observer(() => {
  useEffect(() => {
    store.getAllPost();
  }, []);

  const [editPost, setEditPost] = useState(null);
  const onSubmitEdit = () => {
    store.updatePost(editPost);
  };
  //  Funciton Change Value
  const onChangeValue = (event) => {
    const { name, value } = event.target;
    setEditPost((prevEditPost) => {
      return {
        ...prevEditPost,
        [name]: value,
      };
    });
  };




  const closePopup = () => {
    setEditPost(null);
  };

  let editElement = null;
  if (!!editPost) {
    editElement = (
      <div>
        <div key={editPost.id}>
          <div className="edit-blog-bg">
            <form className="form-edit" onSubmit={onSubmitEdit}>
              <h1>แก้ไขเนื้อหา</h1>
              <input
                name="topic"
                type="text"
                className="input is-primary"
                onChange={onChangeValue}
                value={editPost.topic}
                placeholder="topic"
              />{" "}
              <br />
              <br />
              <textarea
                name="content"
                id=""
                rows="10"
                className="textarea"
                value={editPost.content}
                placeholder="content"
                onChange={onChangeValue}
              ></textarea>{" "}
              <br />
              <input
                name="author"
                type="text"
                className="input is-primary"
                onChange={onChangeValue}
                value={editPost.author}
                placeholder="author"
                disabled
              />
              <input
                name="author"
                type="hidden"
                className="input is-primary"
                onChange={onChangeValue}
                value={editPost.id}
                placeholder="id"
                disabled
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
    <div className="main">
      <h1 className="h1-top">WEB BOARD API</h1>
      <div>
        {store.posts.map((post) => {
          return (
            <div key={post.id} className="app-blog">
              <h1 className="topic">ชื่อกระทู้ : {post.topic}</h1>
              <h3 className="numpost">
                ชื่อผู้เขียน : {post.author}{" "}
                <span>หมายเลขกระทู้ : {post.id}</span>
              </h3>
              <br></br>
              <Link to={`/post/${post.id}`}>
                <button className="button is-info is-small is-outlined">
                  READ MORE
                </button>
              </Link>
              <br />
              <br />
              <button
                className="button is-info"
                onClick={() => {
                  {
                    setEditPost(post);
                  }
                }}
              >
                EDIT
              </button>
              <button
                className="button is-danger"
                onClick={() => {
                  store.delPost(post.id);
                }}
              >
                DELETE
              </button>
            </div>
          );
        })}
      </div>
      {editElement}
    </div>
  );
});

export default Home;
