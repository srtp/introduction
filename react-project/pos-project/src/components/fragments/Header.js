import React from "react";
import * as loginActions from "./../../actions/login.action";
import { useDispatch } from "react-redux";
import { useNavigate } from "react-router-dom";

function Header(props) {
  let navigate = useNavigate();
  const dispatch = useDispatch();
  const { toggleDrawer } = props;

  const navigateToLogout = () => {
    return navigate("/login");
  };
  return (
    <div>
      <nav className="navbar is-link">
        <div className="navbar-brand">
          <button className="btn btn-square btn-ghost" onClick={toggleDrawer}>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              className="inline-block w-6 h-6 stroke-current"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth={2}
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>
          </button>
          <a className="navbar-item" href="https://bulma.io">
            <img
              src="/images/logomysrtp.png"
              alt="Bulma: a modern CSS framework based on Flexbox"
              height={80}
            />
          </a>
          <div
            className="navbar-burger"
            data-target="navbarExampleTransparentExample"
          >
            <span />
            <span />
            <span />
          </div>
        </div>
        <div id="navbarExampleTransparentExample" className="navbar-menu">
          <div className="navbar-end">
            <div className="navbar-item">
              <div className="field is-grouped">
                <p className="control">
                  <a className="button is-light is-small">
                    <span
                      onClick={() => {
                        dispatch(loginActions.logout({ navigateToLogout }));
                      }}
                    >
                      Logout
                    </span>
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  );
}

export default Header;
