import React from 'react';
import { useState, useEffect } from "react";
import { Link } from "react-router-dom";

type resultProps = {
    id: string;
    emp_id: string;
    time_in: string;
    time_out: string;
    status: string;
};

const Home: React.FC = () => {
    const [result, setResult] = useState<resultProps[]>([]);
    useEffect(() => {
        const api = async () => {
            const data = await fetch("http://127.0.0.1:8000/api/attendance", {
                method: "GET"
            });
            const jsonData = await data.json();
            // console.log(jsonData)
            setResult(jsonData);
        };

        api();
    }, []);
    // console.log(result)

    return <div className="container">
       <div className="table-wrapper">
           <h3 className="text-center">Employee Attendance List</h3>
           <hr/>
           <Link to="/upload/attendance" className="button text-right">Upload Attendance</Link>
           <table>
               <thead>
               <tr>
                   <th>ID</th>
                   <th>Emp ID</th>
                   <th>Time In</th>
                   <th>Time Out</th>
                   <th>Status</th>
               </tr>
               </thead>
               <tbody>
               {result.map((value) => {
                   return (
                       <tr>
                           <td>{value.id}</td>
                           <td>{value.emp_id}</td>
                           <td>{value.time_in}</td>
                           <td>{value.time_out}</td>
                           <td>{value.status}</td>
                       </tr>
                   );
               })}
               </tbody>
           </table>
       </div>
    </div>;
};

export default Home;