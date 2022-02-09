import React from "react";
import { BrowserRouter as Router, Link, Route, Routes } from "react-router-dom";
import Home from "./Home";
import NotFound from "./NotFound";
import PostElements from "./post/PostElements";
import Write from "./Write";

function Header() {
  return (
    <Router>
      <div>
        {" "}
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
        <Routes>
          <Route path="/" exact element={<Home />} />
          <Route path="/post/:id" element={<PostElements />} />
          <Route path="/write" exact element={<Write />} />
          <Route path="*" element={<NotFound />} />
        </Routes>
      </div>
    </Router>
  );
}

export default Header;
