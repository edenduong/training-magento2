using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Linq;
using System.Windows.Forms;
using HtmlAgilityPack;
using System.Timers;
using HtmlDocument = HtmlAgilityPack.HtmlDocument;

namespace WindowsFormsApp1
{
    public partial class Form1 : Form
    {
        private System.Timers.Timer syncTimer;
        public Form1()
        {
            InitializeComponent();
            SetSyncTimer();
        }

        private void Form1_Load(object sender, EventArgs e)
        {


        }

        public void SetSyncTimer()
        {
            this.notifyIcon1.Visible = true;
            // Create a timer with a five second interval.
            syncTimer = new System.Timers.Timer(5000);

            // Hook up the Elapsed event for the timer. 
            syncTimer.Elapsed += SynchronizeCache;
            syncTimer.AutoReset = true;
            syncTimer.Enabled = true;
        }
        public void SynchronizeCache(Object source, ElapsedEventArgs e)
        {
            HtmlWeb web = new HtmlWeb();
            HtmlDocument document = web.Load("http://s.cafef.vn/hose/MBB-ngan-hang-thuong-mai-co-phan-quan-doi.chn");
            var threadItems = document.DocumentNode.SelectNodes("//*[@id='contentV1']/div[4]/div[2]/div[1]/div[1]/div[1]/div[3]").ToList();

            var items = new List<object>();
            foreach (var item in threadItems)
            {
                this.notifyIcon1.BalloonTipText = item.InnerHtml;
                this.notifyIcon1.ShowBalloonTip(5000);

            }
        }


    }
}
