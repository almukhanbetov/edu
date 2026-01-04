export default function StatsCards() {
    const stats = [
        { label: 'Users', value: 124 },
        { label: 'Orders', value: 32 },
        { label: 'Revenue', value: '$4,200' },
    ];

    return (
        <div className="grid grid-cols-3 gap-4">
            {stats.map((s, i) => (
                <div
                    key={i}
                    className="bg-slate-800 rounded-lg p-4 text-center"
                >
                    <div className="text-gray-400 text-sm">{s.label}</div>
                    <div className="text-xl font-semibold">{s.value}</div>
                </div>
            ))}
        </div>
    );
}
