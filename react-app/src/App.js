import { BrowserRouter, Route, Routes, Navigate } from "react-router-dom";
import "./App.css";
import Projects from "./pages/Projects";


function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Navigate to="/projects" />} />
          <Route path="/projects" element={<Projects />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
