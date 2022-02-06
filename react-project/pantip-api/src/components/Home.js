import React, { useEffect } from "react";
import { observer } from "mobx-react-lite";
import { store } from "./store/store";
import "./style.css";

const Home = observer(() => {
  useEffect(() => {
    store.getAllPost();
  }, []);

  return (
    <div className="main">
      <h1 className="h1-top">WEB BOARD API</h1>
      <div>
        {store.posts.map((post) => {
          return (
            <div key={post.id} className="app-blog">
              <h1 className="topic">ชื่อกระทู้ : {post.title}</h1>
              <h3 className="numpost">หมายเลขกระทู้ : {post.id}</h3>
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
    </div>
  );
});

export default Home;
