import {
  LOGIN_FAILED,
  LOGIN_FETCHING,
  LOGIN_SUCCESS,
  LOGOUT,
} from "../Constants";

export const setStateToFetching = () => ({
  type: LOGIN_FETCHING,
});

export const setStateToSuccess = (payload) => ({
  type: LOGIN_SUCCESS,
  payload,
});

export const setStateToFailed = (payload) => ({
  type: LOGIN_FAILED,
  payload,
});

export const setStateToLogout = () => ({
  type: LOGOUT,
});

export const login = ({ username, password, navigateToStock }) => {
  return (dispatch) => {
    dispatch(setStateToFetching());
    setTimeout(() => {
      dispatch(setStateToSuccess("ok"));
      navigateToStock();
    }, 1000);
  };
};

export const logout = ({ navigateToLogout }) => {
  return (dispatch) => {
    dispatch(setStateToLogout());
    navigateToLogout();
  };
};

export const setSuccess = () => {
  return (dispatch) => {
    dispatch(setStateToSuccess("ok"));
  };
};

export const hasError = (payload) => {
  return (dispatch) => {
    dispatch(setStateToFailed(payload));
  };
};
