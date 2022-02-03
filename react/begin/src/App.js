import React, { useState } from "react";
import CounterClassComponent from "./components/CounterClassComponent";
import CounterFunctionalComponent from "./components/CounterFunctionalComponent";
import Ex1Style from "./components/ex1_styles";
// import UseStateBegin from "./components/UseStateBegin";
import Ex2Img from "./components/ex2_img";
import Ex3Props from "./components/ex3_props";
import Ex4Des from "./components/ex4_destructuring";

export default function App() {
  const submit = () => {
    alert("heyhey");
  };
  const [count, setCount] = useState(0);
  return (
    <div>
      <div>

        <h1>Count : {count}</h1>
        <button
          onClick={() => {
            setCount(count + 1);
          }}
        >
          ADD
        </button>
      </div>

      <CounterClassComponent />
      <CounterFunctionalComponent />
      <Ex1Style />
      <Ex2Img image="/logo512.png" />
      <Ex3Props count={count} color="green" />
      <Ex4Des usernameHint="test" passwordHint="0000" />
      <Ex4Des handleSubmit={submit} />
    </div>
  );
}
