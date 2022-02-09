import React, { useState } from "react";
import "./style.css";
import { observer } from "mobx-react-lite";
import { store } from "./store/store";

const Write = observer(() => {
  const [post, setPost] = useState([]);
  //  Funciton Change Value
  const onChangeValue = (event) => {
    const { name, value } = event.target;
    setPost((prevPost) => {
      return {
        ...prevPost,
        [name]: value,
      };
    });
  };

  const onSubmit = () => {
    store.createPost(post);
  };
  return (
    <div>
      <div style={{ width: 1000, margin: 20 }}>
        <h1 style={{ color: "white" }}>WRITE</h1>
        <form onSubmit={onSubmit} to="/">
          <input
            name="topic"
            type="text"
            className="input is-light topic"
            placeholder="topic"
            value={post.topic}
            onChange={onChangeValue}
          />
          <br />
          <textarea
            name="content"
            id=""
            rows="10"
            className="textarea"
            placeholder="content"
            value={post.content}
            onChange={onChangeValue}
          ></textarea>{" "}
          <br />
          <input
            name="author"
            type="text"
            value={post.author}
            className="input is-primary"
            placeholder="author"
            onChange={onChangeValue}
          />
          <br /> <br />
          <button className="button is-success" type="submit">
            Submit
          </button>
        </form>
      </div>
    </div>
  );
});

export default Write;
