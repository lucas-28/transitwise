import pandas as pd
with ('/Users/lucas/downloads/ReleaseableAircraft/MASTER.csv'):
    df = pd.read_csv('MASTER.csv')
    df.to_sql('planes', con=engine, if_exists='replace', index=False)