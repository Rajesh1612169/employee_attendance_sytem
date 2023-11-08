import React, { useState } from 'react';
import * as XLSX from 'xlsx';

const Upload: React.FC = () => {
    const [fileData, setFileData] = useState<any[]>([]);
    const [uploading, setUploading] = useState(false);
    const [uploadError, setUploadError] = useState<string | null>(null);

    const handleFileUpload = (e: React.ChangeEvent<HTMLInputElement>) => {
        const file = e.target.files && e.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = (e) => {
                const result = e.target?.result as ArrayBuffer;
                if (result) {
                    const data = new Uint8Array(result);
                    const workbook = XLSX.read(data, { type: 'array' });

                    const sheetName = workbook.SheetNames[0];
                    const worksheet = workbook.Sheets[sheetName];

                    const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });
                    setFileData(jsonData);
                }
            };

            reader.readAsArrayBuffer(file);
        }
    };

    const handleSubmit = async () => {
        setUploading(true);
        setUploadError(null);

        try {
            // Convert the fileData to JSON string
            const jsonData = JSON.stringify(fileData);
            console.log(jsonData)

            // Post the JSON data to the API using fetch
            const response = await fetch('http://127.0.0.1:8000/api/attendance/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: jsonData,
            });

            if (!response.ok) {
                throw new Error('Failed to post data to the API');
            }

            const responseText = await response.text();

            // Handle cases where the response may not be valid JSON
            let responseData;
            try {
                responseData = JSON.parse(responseText);
            } catch (error) {
                console.error('Error parsing JSON:', error);
                setUploadError('Invalid JSON response from the API');
                return;
            }

            console.log('API Response:', responseData);
        } catch (error) {
            if (error instanceof Error) {
                console.error('Error posting data to the API:', error);
                setUploadError('Error posting data to the API: ' + error.message);
            } else {
                console.error('Unknown error:', error);
                setUploadError('An unknown error occurred');
            }
        } finally {
            setUploading(false);
        }
    };

    return (
        <div className="container">
            <h3 className="text-center">Employee Attendance Upload</h3>
            <form>
                <input
                    type="file"
                    className="file-input"
                    accept=".xlsx, .xls"
                    onChange={handleFileUpload}
                />
                <button type="button" onClick={handleSubmit} disabled={uploading || fileData.length === 0}>
                    {uploading ? 'Uploading...' : 'Submit'}
                </button>
            </form>
            {uploadError && <p className="error-message">{uploadError}</p>}
            {fileData.length > 0 && (
                <div>
                    <h4>Uploaded Data:</h4>
                    <pre>{JSON.stringify(fileData, null, 2)}</pre>
                </div>
            )}
        </div>
    );
};

export default Upload;
