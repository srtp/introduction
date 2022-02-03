import React from "react";
import "./Home.css";

export default function ElementComments(props) {
  const { allComment } = props;

  const Element = allComment.map((theComments) => {
    return (
      <div className="box-comment">
        <h1 className="comment-content">ข้อความ</h1><p></p>
        <span className="span-content">{theComments.comment}</span>
        <p className="reply-author">ผู้ตอบกลับ : <span className="span-author">{theComments.author}</span> </p>
      </div>
    );
  });

  return <div>{Element}</div>;
}
