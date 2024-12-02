import React from "react";
import Project from "../components/Project";
import { projects } from "../context/data";

const Projects = () => {
  return (
    <div className="projects-container">
      {projects.map((p) => (
        <Project project={p} key={p.id} />
      ))}
    </div>
  );
};

export default Projects;
