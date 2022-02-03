import React from "react";

function Profile() {
  const logout = () => {
    localStorage.removeItem("accessToken");
    window.location.href = "/";
  };
  return (
    <div>
      <h1>Profile</h1>
      <button className="btn btn-danger" onClick={logout}>
        Logout
      </button>
    </div>
  );
}

export default Profile;
