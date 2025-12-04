@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')

    <div class="row g-3">

        <div class="col-12 col-xl-4">
            <div class="card p-3 stat">
                <div class="d-flex align-items-center gap-3">
                    <div class="tile"><i class="bi bi-people"></i></div>
                    <div class="flex-grow-1">
                        <div class="card-title m-0">Earnings (30d)</div>
                        <div class="fs-5 fw-semibold text-muted">$3,200</div>
                        <div class="small text-muted">+$260 this week</div>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card p-3 stat">
                <div class="d-flex align-items-center gap-3">
                    <div class="tile"><i class="bi bi-currency-dollar"></i></div>
                    <div class="flex-grow-1">
                        <div class="card-title m-0">Earnings (30d)</div>
                        <div class="fs-5 fw-semibold text-muted">$3,200</div>
                        <div class="small text-muted">+$260 this week</div>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card p-3 stat">
                <div class="d-flex align-items-center gap-3">
                    <div class="tile"><i class="bi bi-stars"></i></div>
                    <div class="flex-grow-1">
                        <div class="card-title m-0">AI Tasks Completed</div>
                        <div class="fs-5 fw-semibold text-muted">128</div>
                        <div class="small text-muted">+15 today</div>
                    </div>
                    <span class="pill">15 ↑</span>
                </div>
            </div>
        </div>
    </div>

    <!-- row 2 -->
    <div class="row g-3 mt-1">
        <!-- Messages -->
        <div class="col-12 col-xl-4">
            <div class="card p-3 h-100">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <div class="card-title m-0">Messages</div>
                    <button class="btn btn-sm btn-outline-secondary">Open inbox</button>
                </div>
                <ul class="list-unstyled list-slim m-0">
                    <li class="d-flex justify-content-between">
                        <div class="d-flex gap-2">
                            <div class="stat tile" style="width:34px;height:34px"><i class="bi bi-person"></i></div>
                            <div>
                                <div class="small text-muted">@mentor</div>
                                <div class="text-muted small">Trading plan review</div>
                            </div>
                        </div>
                        <span class="pill">Unread</span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <div class="d-flex gap-2">
                            <div class="stat tile" style="width:34px;height:34px"><i class="bi bi-person"></i></div>
                            <div>
                                <div class="small ">@clientA</div>
                                <div class="text-muted small">Approve article outline</div>
                            </div>
                        </div>
                        <span class="pill">Unread</span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <div class="d-flex gap-2">
                            <div class="stat tile" style="width:34px;height:34px"><i class="bi bi-lightning"></i></div>
                            <div>
                                <div class="small">@platform</div>
                                <div class="text-muted small">Payout sent: $240</div>
                            </div>
                        </div>
                        <span class="small text-muted">Today</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Announcement -->
        <div class="col-12 col-xl-4">
            <div class="card p-3 h-100">
                <div class="card-title">Announcement</div>
                <div class="fw-semibold mb-2 text-muted">Product is live</div>
                <p class="text-muted small mb-3">
                    Generate action plans, auto-design Figma flows, and launch templated side hustles with
                    one click.
                </p>
                <button class="btn btn-primary btn-sm w-100" id="aiLaunchBtn">Try Copilot</button>
            </div>
        </div>

        <!-- Chart -->
        <div class="col-12 col-xl-4">
            <div class="card p-3 h-100">
                <div class="d-flex justify-content-between mb-1">
                    <div class="card-title m-0">Recent Activity</div>
                    <button class="btn btn-sm btn-outline-secondary">Try Copilot</button>
                </div>

                <svg class="chart" viewBox="0 0 320 150" preserveAspectRatio="none" role="img" aria-label="activity">
                    <defs>
                        <linearGradient id="gradLine" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#86a4ff" />
                            <stop offset="100%" stop-color="#5670ff" />
                        </linearGradient>
                        <linearGradient id="gradFill" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#5670ff" stop-opacity=".28" />
                            <stop offset="100%" stop-color="#5670ff" stop-opacity="0" />
                        </linearGradient>
                        <filter id="glow">
                            <feGaussianBlur stdDeviation="2.5" result="blur" />
                            <feMerge>
                                <feMergeNode in="blur" />
                                <feMergeNode in="SourceGraphic" />
                            </feMerge>
                        </filter>
                    </defs>
                    <line x1="0" y1="126" x2="320" y2="126" class="axis" />
                    <path class="fill"
                        d="M0,112 L40,114 L80,110 L120,115 L160,99 L200,104 L240,86 L280,72 L320,60 L320,150 L0,150 Z" />
                    <polyline class="line" points="0,112 40,114 80,110 120,115 160,99 200,104 240,86 280,72 320,60" />
                </svg>

                <div class="d-flex justify-content-between text-muted small">
                    <span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>May</span><span>Jun</span>
                </div>
            </div>
        </div>
    </div>

    <!-- row 3 -->
    <div class="row g-3 mt-1">
        <!-- Earnings -->
        <div class="col-12 col-xl-4">
            <div class="card p-3 h-100">
                <div class="d-flex justify-content-between">
                    <div class="card-title m-0">Earnings</div>
                    <a href="#" class="text-muted small text-decoration-none">Unbox</a>
                </div>
                <ul class="list-unstyled list-slim m-0 mt-1">
                    <li>
                        <div class="small text-muted">Today at 08:00</div>
                        <div class="text-muted small">Payout sent to @lane — <strong class="text-white">$240</strong>
                        </div>
                    </li>
                    <li>
                        <div class="small">Yesterday</div>
                        <div class="text-muted small">Model retrained for keyword intent</div>
                    </li>
                    <li>
                        <div class="small">Mon</div>
                        <div class="text-muted small">Crypto Signals Pack sold (x12)</div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Recent activity list -->
        <div class="col-12 col-xl-4">
            <div class="card p-3 h-100">
                <div class="card-title">Recent Activity</div>
                <ul class="list-unstyled list-slim m-0">
                    <li class="d-flex justify-content-between ">
                        <div class="d-flex align-items-center gap-2 text-muted">
                            <span class="pill text-muted">●</span> <span>Print-on-Demand Store</span>
                        </div>
                        <span class="small text-muted">Live</span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <div class="d-flex align-items-center gap-2 text-muted">
                            <span class="pill">●</span> <span>AI Resume Builder</span>
                        </div>
                        <span class="small text-muted">Testing</span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <div class="d-flex align-items-center gap-2 text-muted">
                            <span class="pill">●</span> <span>Model retrained for keyword intent</span>
                        </div>
                        <span class="small text-muted">Just now</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Top Hustles -->
        <div class="col-12 col-xl-4">
            <div class="card p-3 h-100" id="cardsGrid">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <div class="card-title m-0">Top Popular Products</div>
                    <div class="d-flex gap-2 small text-muted">
                        <a href="#" class="text-muted text-decoration-none">Export</a><span>·</span>
                        <a href="#" class="text-muted text-decoration-none">All</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Status</th>
                                <th class="text-end">30d Earnings</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-muted">Crypto Signals Pack</td>
                                <td><span class="pill">Live</span></td>
                                <td class="text-end text-muted">$1,240</td>
                            </tr>
                            <tr>
                                <td class="text-muted"> Print-on-Demand Store</td>
                                <td><span class="pill">Scaling</span></td>
                                <td class="text-end text-muted">$980</td>
                            </tr>
                            <tr>
                                <td class="text-muted">AI Resume Builder</td>
                                <td><span class="pill">Testing</span></td>
                                <td class="text-end text-muted">$420</td>
                            </tr>
                            <tr>
                                <td class="text-muted">YouTube Faceless Channel</td>
                                <td><span class="pill">Live</span></td>
                                <td class="text-end text-muted">$780</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div><!-- /row -->

@endsection
