import { useEffect, useState } from 'react';
import axios from 'axios';

export default function UsersTable() {
    const [users, setUsers] = useState([]);

    useEffect(() => {
        axios.get('/api/users')
            .then(res => setUsers(res.data));
    }, []);

    return (
        <div className="bg-slate-800 rounded-lg p-4">
            <h2 className="text-lg mb-3">Users</h2>

            <table className="w-full text-sm">
                <thead>
                    <tr className="text-gray-400 border-b border-slate-700">
                        <th className="text-left py-2">ID</th>
                        <th className="text-left">Name</th>
                    </tr>
                </thead>
                <tbody>
                    {users.map(u => (
                        <tr key={u.id} className="border-b border-slate-700">
                            <td className="py-2">{u.id}</td>
                            <td>{u.name}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}
