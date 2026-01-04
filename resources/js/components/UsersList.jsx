import { useEffect, useState } from 'react';
import axios from 'axios';

export default function UsersList() {
    const [users, setUsers] = useState([]);

    useEffect(() => {
        axios.get('/api/users')
            .then(res => setUsers(res.data));
    }, []);

    return (
        <ul className="space-y-1">
            {users.map(user => (
                <li key={user.id}>{user.name}</li>
            ))}
        </ul>
    );
}
