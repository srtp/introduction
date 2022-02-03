import axios from "axios";
import React, { useState } from "react";

function Signin() {
  const [username, setUsername] = useState();
  const [password, setPassword] = useState();
  async function loginUser(username,password) {
    return axios
      .post("https://www.mecallapi.com/api/login", {
        username: username,
        password: password,
      })
      .then((result) => result.data);
  }

  const handleSubmit = async (event) => {
    event.preventDefault();
    const response = await loginUser( username, password );
    console.log(response);
    if ("accessToken" in response) {
      localStorage.setItem("accessToken", response.accessToken);
      localStorage.setItem("user", JSON.stringify(response.user));
      window.location.href = "/profile";
    }
  };
  return (
    <div>
      <form onSubmit={handleSubmit}>
        <div className="mb-3">
          <label htmlFor="exampleInputEmail1" className="form-label">
            Email address
          </label>
          <input
            type="email"
            className="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            onChange={(event) => setUsername(event.target.value)}
          />
        </div>
        <div className="mb-3">
          <label htmlFor="exampleInputPassword1" className="form-label">
            Password
          </label>
          <input
            type="password"
            className="form-control"
            id="exampleInputPassword1"
            onChange={(event) => setPassword(event.target.value)}
          />
        </div>

        <button type="submit" className="btn btn-primary">
          Submit
        </button>
      </form>
    </div>
  );
}

export default Signin;
