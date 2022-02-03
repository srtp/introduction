import {
  LOGIN_FAILED,
  LOGIN_FETCHING,
  LOGIN_SUCCESS,
  LOGOUT,
} from "../Constants";

const initialState = {
  result: null,
  error: false,
  isFetching: false,
};

export default function loginReducer(state = initialState, { type, payload }) {
  switch (type) {
    case LOGIN_FETCHING:
      return { ...state, isFetching: true, error: false, result: null };
    case LOGIN_FAILED:
      return { ...state, isFetching: false, error: true, result: payload };
    case LOGIN_SUCCESS:
      return { ...state, isFetching: false, error: false, result: payload };
    case LOGOUT:
      return initialState;
    default:
      return state;
  }
}
