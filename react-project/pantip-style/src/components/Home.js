import React from "react";
import "./Home.css";
import { Link } from "react-router-dom";

export default function Home(props) {
  const {
    allBlog,
    blog,
    editBlog,
    onChangeValue,
    onEditChangeValue,
    onBlogSubmit,
    onEditBlog,
    onDeleteBlog,
    closePopup,
    setEditBlog,
  } = props;

  //  Element

  //  Element Blog/id

  //  Element Blog

  const blogElement = allBlog.map((theBlog) => {
    return (
      <div key={theBlog.id} className="app-blog">
        <h1 className="topic">หัวข้อ : {theBlog.topic}</h1>
        {/* <p className="content">เนื้อหา: {theBlog.content.substring(0, 10)}</p> */}
        <h3>
          {" "}
          ผู้เขียน: {theBlog.author} <span>| หมายเลขกระทู้ : {theBlog.id}</span>
        </h3>
        <br></br>
        <Link to={`/blog/${theBlog.id}`}>
          <button
            className="button is-info is-small is-outlined"
            key={theBlog.id}
          >
            READ MORE
          </button>
        </Link>{" "}
        <br></br>
        <br></br>
        <button
          className="button is-primary is-link "
          onClick={() => {
            setEditBlog(theBlog);
          }}
        >
          EDIT
        </button>{" "}
        <button
          className="button is-danger"
          onClick={() => {
            onDeleteBlog(theBlog.id);
          }}
        >
          DELETE
        </button>
      </div>
    );
  });

  //  Element Edit
  let editBlogElement = null;
  if (!!editBlog) {
    editBlogElement = (
      <div className="edit-blog-bg">
        <form onSubmit={onEditBlog} className="form-edit">
          <h1>แก้ไขเนื้อหา</h1>
          <textarea
            name="content"
            id=""
            rows="10"
            className="textarea"
            placeholder="content"
            value={editBlog.content}
            onChange={onEditChangeValue}
          ></textarea>{" "}
          <br />
          <input
            name="author"
            type="text"
            className="input is-primary"
            placeholder="author"
            value={editBlog.author}
            onChange={onEditChangeValue}
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
    );
  }

  return (
    <div align="center">
      <br></br>
      <h1>PANTIP</h1>
      <div style={{ width: 1000 }}>
        <form onSubmit={onBlogSubmit}>
          <input
            name="topic"
            type="text"
            className="input is-light topic"
            placeholder="topic"
            value={blog.topic}
            onChange={onChangeValue}
          />
          <br />
          <textarea
            name="content"
            id=""
            rows="10"
            className="textarea"
            placeholder="content"
            value={blog.content}
            onChange={onChangeValue}
          ></textarea>{" "}
          <br />
          <input
            name="author"
            type="text"
            className="input is-primary"
            placeholder="author"
            value={blog.author}
            onChange={onChangeValue}
          />
          <br /> <br />
          <button className="button is-success" type="submit">
            Submit
          </button>
        </form>
      </div>
      <div>{blogElement}</div>
      <div>{editBlogElement}</div>
    </div>
  );
}
