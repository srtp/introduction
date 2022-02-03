import React from "react";
import { Button,Container } from "@mui/material";
import { pink, green } from "@mui/material/colors";

export default function App() {
  return (
    <Container>
      <Button variant="contained" style={{ backgroundColor: pink[100] }}>
        TEST
      </Button>
      <Button variant="contained" style={{ backgroundColor: green[500] }}>
        TEST
      </Button>

      <Button variant="contained" color="primary">
        TEST
      </Button>
    </Container>
  );
}
