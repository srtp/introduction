import React from "react";
import "./Home.css";

export default function ElementSingleBlog(props) {
  const { dataBlog } = props;
  return (
    <div>
      <div className="single-blog">
        <h1 className="single-h1">หัวข้อ : {dataBlog.topic}</h1>
        <p>{dataBlog.content}</p>
        <br />
        <br />
        <p>
          ผู้เขียน : <span className="author">{dataBlog.author}</span>
          <span> | หมายเลขกระทู้ : </span>
          <span className="single-id">{dataBlog.id}</span>
        </p>
      </div>
    </div>
  );
}
