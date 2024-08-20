# Dealux AI/ML Core

The AI/ML Core of Dealux is built using Python + Flask.


## Installation

### Prerequisites
- [Python](https://www.python.org/downloads/)
- [virtualenv](https://virtualenv.pypa.io/)
- API Keys from supported e-commerce platforms 

### Setup
1. Clone the Repository and cd to the directory `Dealux/ml`
```bash
cd Dealux/ml
```

2. Setup Environment Variables
- Make a `.env` file which includes the API keys of supported e-commerce platforms

3. Create virtualenv process (skip if done):
```bash
python3 -m virtualenv venv
```

4. Start virtualenv process
```bash
source ./venv/bin/activate # Linux/Mac

venv\Scripts\activate # Windows
```

5. Install Dependencies
```bash
pip3 install -r requirements.txt
```

6. Start the process
```bash
python3 app.py
```
