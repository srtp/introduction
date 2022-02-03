import { useState } from "react";
import "./App.css";
import AppHeader from "./components/AppHeader";
import TattooItem from "./components/TattooItem";
import TattooPost from "./components/TattooPost";
import tattoos from "./data/tattoos";
import Appsearch from "./components/Appsearch";

function App() {
  const [selectedTattoo, setSelectedTattoo] = useState(null);
  const [searchText, setSearchText] = useState("");

  function openClick(theTattoo) {
    setSelectedTattoo(theTattoo);
  }

  function closePopup() {
    setSelectedTattoo(null);
  }

  const tattooElements = tattoos
    .filter((tattoo) => {
      return tattoo.title.includes(searchText);
    })
    .map((tattoo, index) => {
      return <TattooItem key={index} tattoo={tattoo} openImg={openClick} />;
    });

  let tattooPost = null;
  if (!!selectedTattoo) {
    tattooPost = <TattooPost tattoo={selectedTattoo} onBgClick={closePopup} />;
  }

  return (
    <div className="App">
      <AppHeader />
      <section className="app-section">
        <div className="app-container">
          <Appsearch value={searchText} onValueChange={setSearchText} />
          <div className="app-grid">{tattooElements}</div>
        </div>
      </section>
      {tattooPost}
    </div>
  );
}

export default App;
