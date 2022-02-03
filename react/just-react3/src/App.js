import React, { useState } from "react";
import LoginArea from "./components/LoginArea";


const AuthContext = React.createContext();

export { AuthContext };

export default function App() {
  const [auth, setAuth] = useState(null);
  return (
    <AuthContext.Provider value={{ auth, setAuth }}>
      <section className="app-section">
        <div className="app-container">
          <LoginArea  />
        </div>
      </section>
    </AuthContext.Provider>
  );
}
