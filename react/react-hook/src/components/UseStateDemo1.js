import React,{ useState } from "react";

export default function UseStateDemo1() {
  const [count, setCount] = useState(0);
  const [title, setTitle] = useState("");
  return (
    <div>
      <h1>DEMO 1</h1>
      <br />
      <button
        onClick={() => {
          setCount(count + 1);
          setTitle("React Hook");
        }}
      >
        ADD
      </button>
      <h3>UseStat : {count}</h3>
      <h3>Title : {title}</h3>
    </div>
  );
}
