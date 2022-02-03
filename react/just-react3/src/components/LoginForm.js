import React, { useContext } from "react";
import { AuthContext } from "../App";

const fakeUser = { username: "petch", fullname: "เพชร" };

export default function LoginForm() {
  const { auth, setAuth } = useContext(AuthContext);
  function loginSubmit(event) {
    event.preventDefault();
    setAuth(fakeUser);
  }

  function logOutSubmit(){
      setAuth(null)
  }
  if (!!auth) {
    return (
      <div>
        <p>Auth username = {auth.username}</p>
        <p>Auth fullname = {auth.fullname}</p>
        <p>
          <button onClick={logOutSubmit}>Log out</button>
        </p>
      </div>
    );
  }
  return (
    <form onSubmit={loginSubmit}>
      <p>
        <input type="text" placeholder="username" />
      </p>
      <p>
        <input type="password" placeholder="password" />
      </p>
      <p>
        <button type="submit">LOGIN</button>
      </p>
    </form>
  );
}
