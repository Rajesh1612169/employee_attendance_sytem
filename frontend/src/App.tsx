import React from 'react';

import './App.css';
import {RouterProvider,createBrowserRouter} from "react-router-dom";
import Home from "./components/Home";
import Upload from "./components/Upload";

const router = createBrowserRouter([
  {
    path: "/",
    element: <Home/>,
  },
  {
    path: "/upload/attendance",
    element: <Upload/>,
  },
]);
function App() {
  return (
    <div className="App">
      <RouterProvider router={router} />
    </div>
  );
}

export default App;
