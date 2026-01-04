import React from 'react';

export default function LessonPlayer({ lessonId, video }) {
    return (
        <div className="max-w-4xl mx-auto p-6 bg-slate-900 text-white">
            <h2 className="text-xl mb-4">Урок #{lessonId}</h2>

            {video && (
                <video controls className="w-full rounded">
                    <source src={video} />
                </video>
            )}
        </div>
    );
}
