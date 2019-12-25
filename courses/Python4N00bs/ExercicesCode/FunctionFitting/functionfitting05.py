import glob
import pandas as pd
import numpy as np
from matplotlib import pyplot as plt
from scipy import optimize

def calc_1(x,a,b):
    return (a*x)+b

def calc_2(x,a,b,c):
    return a*(x+b)**2 + c

def plot(file):
    try:
        path = '\\'.join((file.split('\\')[0:(len(file.split('\\')))-2]))
        number = (file.split('\\')[len(file.split('\\'))-1]).split('.')[0]
        data = pd.read_csv(file)
        x,y = data['x'].values,data['y'].values
        c,cov = optimize.curve_fit(calc_2,x,y,[2,1,3])
        fig = plt.figure()
        m, = plt.plot(x, y, 'ro', markersize=2, label='measured data')
        p, = plt.plot(x, calc_2(x,c[0],c[1],c[2]),'g-', label='linear data')
        plt.legend(handles=[m,p])
        plt.xlabel('x values')
        plt.ylabel('y values')
        plt.title(f"FunctionFitting {number}")
        for filetype in ['png','svg']:
            plt.savefig(f"{path}\\plots\\{number}.{filetype}")
        plt.close(fig)
    except:
        print(f'Error creating plot of {file}')
        pass

for file in glob.glob('C:\\_git\\github\\Python4N00bs\\ExercicesCode\\FunctionFitting\\data\\*.csv'):
    plot(file)