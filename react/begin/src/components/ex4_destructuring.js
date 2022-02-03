import React from "react";

export default function ex4_destructuring({ usernameHint, passwordHint,handleSubmit }) {
  const product = {
    name: "Angular",
    price: 10,
  };

  const {name,price} = product
  return (
    <div>
      <form onSubmit={event=>{
        event.preventDefault();
        handleSubmit()
      }}>
        <label htmlFor="username">Username</label>
        <input
          type="text"
          name="username"
          id="username"
          placeholder={usernameHint}
        />
        <br />
        <label htmlFor="password">password</label>
        <input
          type="text"
          name="password"
          id="password"
          placeholder={passwordHint}
        />
        <br />
        <button type="submit">Submit</button>
      </form>
      <h1>{name}</h1>
      <h1>{price}</h1>
    </div>
  );
}
