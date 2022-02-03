import React, { useState } from "react";
import { useDispatch } from "react-redux";
import { useNavigate } from "react-router-dom";
import * as loginActions from "./../../actions/login.action";

function Login(props) {
  let navigate = useNavigate();
  const [account, setAccount] = useState({
    username: "",
    password: "",
  });

  const navigateToStock = () => {
    return navigate("/stock");
  };

  // onChangeValue
  const onChangeValue = (event) => {
    const { name, value } = event.target;
    setAccount((prevAccount) => {
      return {
        ...prevAccount,
        [name]: value,
      };
    });
  };

  const dispatch = useDispatch();
  return (
    <div>
      <div style={{ width: "400px" }}>
        <div className="card">
          <div className="card-image">
            <figure className="image is-16by9">
              <img
                src={`${process.env.PUBLIC_URL}/images/authen_header.jpg`}
                alt="p"
              />
            </figure>
          </div>
          <div className="card-content">
            <div className="media">
              <div className="media-content">
                <p className="title is-4">Login</p>
              </div>
            </div>
            <form
              onSubmit={(event) => {
                event.preventDefault();
                dispatch(
                  loginActions.login({ ...account, ...props, navigateToStock })
                );
              }}
            >
              <div className="content">
                <input
                  name="username"
                  className="input is-info"
                  value={account.username}
                  onChange={onChangeValue}
                  type="text"
                  placeholder="Username"
                />
                <br />
                <br />
                <input
                  name="password"
                  value={account.password}
                  onChange={onChangeValue}
                  className="input is-info"
                  type="text"
                  placeholder="Password"
                />
                <br />
                <br />
                <button className="button is-link is-fullwidth">SIGN IN</button>
                <br />
                <button
                  className="button is-light is-fullwidth"
                  onClick={() => navigate("/register")}
                >
                  REGISTER
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Login;
