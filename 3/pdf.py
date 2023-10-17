from PyPDF2 import PdfMerger

import glob

files = glob.glob("uploads/*")

merger = PdfMerger()

for file in files:
    merger.append(file)
merger.write("merged.pdf")
merger.close