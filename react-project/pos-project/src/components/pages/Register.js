import { Formik } from "formik";
import React from "react";
import { useNavigate } from "react-router-dom";
import Axios from "axios";
import { apiUrl, server } from "../../Constants";

import * as loginActions from "./../../actions/login.action";
import { useDispatch, useSelector } from "react-redux";
import Swal from "sweetalert2";

function Register() {
  const loginReducer = useSelector(({ loginReducer }) => loginReducer);
  const dispatch = useDispatch();
  let navigate = useNavigate();

  const alertSuccess = () => {
    const alert = Swal.fire({
      icon: "success",
      title: "Your register has been saved",
      showConfirmButton: false,
      timer: 1500,
    });
    const goPage = navigate("/stock");

    return { alert, goPage };
  };

  function showForm({
    values,
    handleChange,
    handleSubmit,
    setFieldValue,
    isSubmitting,
  }) {
    return (
      <form onSubmit={handleSubmit}>
        <div className="content">
          <input
            id="username"
            value={values.username}
            onChange={handleChange}
            className="input is-info"
            type="text"
            placeholder="Username"
          />
          <br />
          <br />
          <input
            id="password"
            value={values.password}
            onChange={handleChange}
            className="input is-info"
            type="password"
            placeholder="Password"
          />
          <br />
          <br />

          <button
            className="button is-link is-fullwidth"
            disabled={isSubmitting}
          >
            REGISTER
          </button>
          <br />
          <button
            className="button is-light is-fullwidth"
            onClick={() => navigate("/login")}
          >
            CANCEL
          </button>
        </div>
      </form>
    );
  }
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
                <p className="title is-4">Register</p>
                {loginReducer.error && (
                  <div className="alert alert-error">
                    <div className="flex-1">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        className="w-6 h-6 mx-2 stroke-current"
                      >
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          strokeWidth={2}
                          d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"
                        />
                      </svg>
                      <label>{loginReducer.result}</label>
                    </div>
                  </div>
                )}
              </div>
            </div>
            <Formik
              initialValues={{ username: "admin", password: "1234" }}
              onSubmit={(values, { setSubmitting }) => {
                // alert(JSON.stringify(values))
                setSubmitting(true);
                Axios.post(
                  "http://localhost:8085/api/v2/authen/register",
                  values
                )
                  .then((result) => {
                    setSubmitting(false);
                    // alert(JSON.stringify(result.data));
                    const { data } = result;
                    if (data.result === "ok") {
                      dispatch(loginActions.setSuccess(alertSuccess()));
                    } else {
                      dispatch(
                        loginActions.hasError(
                          "Error, your infomation is not correct!"
                        )
                      );
                    }
                  })
                  .catch((error) => {
                    alert(JSON.stringify(error));
                  });
              }}
            >
              {(props) => showForm(props)}
            </Formik>
          </div>
        </div>
      </div>
      <div>
        {/* {!loginReducer.error && loginReducer.result === "ok" && (
          <div></div>
        )} */}
      </div>
    </div>
  );
}

export default Register;
