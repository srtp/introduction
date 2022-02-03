import React, { useState } from "react";
import { Link, Route, Switch } from "react-router-dom";
import Write from "./Write";
import Home from "./Home";
import SingleBlog from "./SingleBlog";

export default function Header() {
  // Blog
  const startBox = {
    topic: "",
    content: "",
    author: "",
  };
  // State
  const [blog, setBlog] = useState(startBox);
  const [allBlog, setAllBlog] = useState([]);
  const [editBlog, setEditBlog] = useState(null);

  //  Funciton Change Value
  const onChangeValue = (event) => {
    const { name, value } = event.target;
    setBlog((prevBlog) => {
      return {
        ...prevBlog,
        [name]: value,
      };
    });
  };

  //  Funciton Edit Change Value
  const onEditChangeValue = (event) => {
    const { name, value } = event.target;
    setEditBlog((prevBlog) => {
      return {
        ...prevBlog,
        [name]: value,
      };
    });
  };

  //  Funciton submit
  const onBlogSubmit = (event) => {
    event.preventDefault();
    setAllBlog((prevAllBlog) => {
      const newBlog = { ...blog };
      newBlog.id = Math.floor(100000 + Math.random() * 900000);
      return [newBlog, ...prevAllBlog];
    });
    setBlog(startBox);
  };

  //  Function Edit
  const onEditBlog = (event) => {
    event.preventDefault();
    setAllBlog((prevAllBlog) => {
      return prevAllBlog.map((theBlog) => {
        if (theBlog.id !== editBlog.id) return theBlog;
        return editBlog;
      });
    });
    setEditBlog(null);
  };

  //  Function Del
  const onDeleteBlog = (blogId) => {
    setAllBlog((prevAllBlog) => {
      return prevAllBlog.filter((theblog) => theblog.id !== blogId);
    });
  };

  //  Function Close Popup Edit
  const closePopup = () => {
    setEditBlog(null);
  };

  // Comment
  const [allComment, setAllComment] = React.useState([]);

  return (
    <div>
      <nav
        className="navbar is-light"
        role="navigation"
        aria-label="main navigation"
      >
        <div className="container">
          <div className="navbar-brand">
            <a className="navbar-item" href="/">
              <b>MYSRTP</b>
            </a>
          </div>
          <div className="navbar-menu">
            <div className="navbar-end">
              <Link className="navbar-item" to="/">
                Home
              </Link>
              <Link className="navbar-item" to="/write">
                Write
              </Link>
            </div>
          </div>
        </div>
      </nav>
      <Switch>
        <Route path="/" exact>
          <Write />
        </Route>
        <Route path="/write">
          <Home
            blog={blog}
            allBlog={allBlog}
            editBlog={editBlog}
            onChangeValue={onChangeValue}
            onEditChangeValue={onEditChangeValue}
            onBlogSubmit={onBlogSubmit}
            onEditBlog={onEditBlog}
            onDeleteBlog={onDeleteBlog}
            closePopup={closePopup}
            setEditBlog={setEditBlog}
          />
        </Route>
        {/* <Route path="/blog/:id" component={SingleBlog}><SingleBlog allBlog={allBlog}/></Route> */}
        <Route
          path="/blog/:id"
          children={(props) => {
            const blogId = props.match.params.id;
            const dataBlog = allBlog.find(
              (findingBlog) => findingBlog.id === Number(blogId)
            );
            if (!dataBlog) {
              return <div>404</div>;
            }
            return (
              <div>
                <SingleBlog dataBlog={dataBlog} allComment={allComment} setAllComment={setAllComment} />
              </div>
            );
          }}
        ></Route>
        <Route path="*">
          <center>
            <br />
            <h1>Error 404</h1>
            <h2>Page Not Found</h2>
          </center>
        </Route>
      </Switch>
    </div>
  );
}
