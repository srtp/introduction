import React from "react";
import Drawer from "react-modern-drawer";
import "react-modern-drawer/dist/index.css";

function Menu(props) {
  const {isOpen,toggleDrawer} = props
  return (
    <div>
      <Drawer
        open={isOpen}
        onClose={toggleDrawer}
        direction="left"
        className="bla bla bla"
      >
        <div>Hello World</div>
      </Drawer>
    </div>
  );
}

export default Menu;
