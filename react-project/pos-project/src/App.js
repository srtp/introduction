import React, { useState } from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Menu from "./components/fragments/Menu";
import Login from "./components/pages/Login";
import Register from "./components/pages/Register";
import Header from "./components/fragments/Header";
import "./components/style.css";
import Stock from "./components/pages/Stock";
import StockCreate from "./components/pages/StockCreate";
import StockEdit from "./components/pages/StockEdit";
import { useSelector } from "react-redux";


function App() {
  const [isOpen, setIsOpen] = useState(false);
  const toggleDrawer = () => {
    setIsOpen((prevState) => !prevState);
  };

  const loginReducer = useSelector(({ loginReducer }) => loginReducer);

  return (
    <div>
      <Router>
        {loginReducer.result && <Header toggleDrawer={toggleDrawer} />}
        {loginReducer.result && (
          <Menu isOpen={isOpen} toggleDrawer={toggleDrawer} />
        )}
        <div className="container div-login">
          <Routes>
            <Route path="/login" element={<Login />} />
            <Route path="/register" element={<Register />} />
            <Route path="/stock" element={<Stock />} />
            <Route path="/stockCreate" element={<StockCreate />} />
            <Route
              path="/stockEdit/:id"
              element={<StockEdit animate={true} />}
            />
          </Routes>
        </div>
      </Router>
    </div>
  );
}

export default App;
