<?php
 include('include/allcss.php'); ?>

 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        canvas {
            max-width: 600px;
            margin: auto;
        }
        .theme-accordion .accordion-item .accordion-button::after {
            content: ""!important;
        }
        .accordion-item {
    border: 1px solid black !important;
    padding: 12px;
}

 /* Accordion Styling */
        .accordion-button {
            background-color: #f8f9fa;
            color: #333;
            font-weight: bold;
            padding: 15px;
            border: none;
            outline: none;
            transition: background-color 0.3s ease;
        }

        .accordion-button:hover {
            background-color: #e2e6ea;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .accordion-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .accordion-body {
            padding: 15px;
            background-color: #fff;
        }

        /* NFT Horizontal Box */
        .nft-horizontal-box {
            padding: 10px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        /* Product Content Styling */
        .product-details {
            text-decoration: none;
        }

        .product-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-radius: 8px;
            background: #f8f9fa;
            transition: transform 0.3s ease;
        }

        .product-content:hover {
            transform: scale(1.03);
        }

        .product-content div {
            padding: 10px;
        }

        h4, h6 {
            margin: 5px 0;
            font-weight: bold;
        }

        p {
            margin: 0;
            color: #555;
        }
    </style>

  <!-- loader start-->
  <?php include('include/loader.php'); ?>

  <?php include('include/sidebar.php'); ?>
  <!-- loader end -->

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <h3 class="middle-title">NSE_EQ|INE090A01021</h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->



  <section class="">
    <div class="custom-container">
      <div class="category-detail-tab">
        
        <div class="tab-content tab w-100" id="pills-tabContent">
          <div class="tab-pane fade show active" id="list" role="tabpanel">
            <div class="accordion theme-accordion" id="optionsContainer">

              
             
            </div>            
          </div>         
        </div>

      </div>
    </div>
  </section>

 <!--  <section class="section-lg-t-space section-b-space">
    <div class="custom-container d-flex justify-content-between">
      <button class="btn btn-primary">buy</button>
      <button class="btn btn-success">Sale</button>
    </div>
  </section> -->
  <!-- Statistics end -->

 

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>

 <script>
    let jsonData = {
        "status": "success",
        "data": [
            {
            "expiry": "2025-04-24",
            "strike_price": 1040.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116662",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116663",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 1.95,
                    "bid_price": 0.05,
                    "bid_qty": 20300,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1080.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116666",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116668",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 4.3,
                    "bid_price": 0.05,
                    "bid_qty": 20300,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1120.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116682",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116697",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 8.55,
                    "bid_price": 0.05,
                    "bid_qty": 20300,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1140.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116698",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116701",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 11.65,
                    "bid_price": 0.05,
                    "bid_qty": 20300,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1160.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116702",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116703",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 15.5,
                    "bid_price": 0.05,
                    "bid_qty": 20300,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1180.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116704",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116705",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 20.25,
                    "bid_price": 0.05,
                    "bid_qty": 20300,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1200.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116706",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116707",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 25.9,
                    "bid_price": 6.05,
                    "bid_qty": 1400,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1220.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116708",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116709",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 32.6,
                    "bid_price": 9.8,
                    "bid_qty": 1400,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1240.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116710",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116711",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 40.35,
                    "bid_price": 14.95,
                    "bid_qty": 1400,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1260.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116715",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116716",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 49.15,
                    "bid_price": 22.5,
                    "bid_qty": 1400,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1280.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116717",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116718",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1300.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116719",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 47.3,
                    "bid_price": 25.35,
                    "bid_qty": 1400,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116720",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": -1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1320.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116721",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116722",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": -1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1340.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116723",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 32.95,
                    "bid_price": 1.0,
                    "bid_qty": 1400,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116724",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": -1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1360.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116725",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 27.15,
                    "bid_price": 0.05,
                    "bid_qty": 20300,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116726",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 108.95,
                    "bid_price": 68.1,
                    "bid_qty": 700,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": -1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1380.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116727",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 22.3,
                    "bid_price": 0.05,
                    "bid_qty": 20300,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116728",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": -1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1400.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116729",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 18.05,
                    "bid_price": 2.0,
                    "bid_qty": 1400,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116730",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 139.2,
                    "bid_price": 97.1,
                    "bid_qty": 1400,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": -1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1440.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116733",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 11.65,
                    "bid_price": 0.05,
                    "bid_qty": 20300,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116734",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": -1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            }
        },
        {
            "expiry": "2025-04-24",
            "strike_price": 1480.0,
            "underlying_key": "NSE_EQ|INE090A01021",
            "underlying_spot_price": 1257.2,
            "call_options": {
                "instrument_key": "NSE_FO|116737",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 7.3,
                    "bid_price": 0.05,
                    "bid_qty": 10500,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": 0.0,
                    "iv": 0.0,
                    "pop": 0.0
                }
            },
            "put_options": {
                "instrument_key": "NSE_FO|116738",
                "market_data": {
                    "ltp": 0.0,
                    "volume": 0,
                    "oi": 0.0,
                    "close_price": 0.0,
                    "bid_price": 0.0,
                    "bid_qty": 0,
                    "ask_price": 0.0,
                    "ask_qty": 0,
                    "prev_oi": 0.0
                },
                "option_greeks": {
                    "vega": 0.0,
                    "theta": 0.0,
                    "gamma": 0.0,
                    "delta": -1.0,
                    "iv": 0.0,
                    "pop": 99.0
                }
            }
        }
        ]
    };

    let container = document.getElementById('optionsContainer');

    jsonData.data.forEach(option => {
        let htmlContent = `<div class="accordion-item">
                <div class="accordion-header" id="heading1">

                  <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                    <div class="nft-horizontal-box d-block">
            <a href="#" class="product-details d-block">
                <div class="product-content w-100">
                    <div>
                        <p>Call Options</p>
                        <p>Strike Price: ${option.strike_price}</p>
                        <h4 style="color:black;">${option.call_options.instrument_key}</h4>
                        <h6 style="color:black;">Bid Qty: ${option.call_options.market_data.bid_qty}</h6>
                    </div>
                    <div>
                        <p>Put Options</p>
                        <p>Strike Price: ${option.strike_price}</p>
                        <h4 style="color:black;">${option.put_options.instrument_key}</h4>
                        <h6 style="color:black;">Bid Qty: ${option.put_options.market_data.bid_qty}</h6>
                    </div>
                </div>
            </a>
        </div></div></div></div>
        `;
        container.innerHTML += htmlContent;
    });
</script>

 <!-- <script>
     
     var settings = {
      "url": "https://api.upstox.com/v2/option/chain?instrument_key=NSE_EQ|INE090A01021&expiry_date=2025-04-24",
      "method": "GET",
      "timeout": 0,
      "headers": {
        "Authorization": "Bearer <?=token ?>",
      },
    };

    $.ajax(settings).done(function (response) {
      console.log(response);
    });


 </script> -->
 

