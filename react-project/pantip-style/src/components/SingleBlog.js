import React from "react";
import "./Home.css";
import ElementSingleBlog from "./ElementSingleBlog";
import InputSingleComment from "./InputSingleComment";
import ElementComments from "./ElementComments";

export default function SingleBlog(props) {
  const { dataBlog, allComment, setAllComment } = props;

  return (
    <div align="center">
      <ElementSingleBlog dataBlog={dataBlog} />
      <ElementComments
        allComment={allComment.filter((comment) => {
          return dataBlog.id === Number(comment.idBlog);
        })}
      />
      <InputSingleComment
        dataBlog={dataBlog}
        allComment={allComment}
        setAllComment={setAllComment}
      />
    </div>
  );
}
